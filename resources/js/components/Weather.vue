<template>
    <tile :position="position" no-fade>
        <div class="grid gap-2 justify-items-center h-full" style="grid-template-rows: auto 1fr auto;">
            <div class="markup">
                <h1>{{ weatherCity }}</h1>
            </div>
            <div class="uppercase">
                <div class="grid gap-4 items-center" style="grid-template-columns: repeat(3, auto);">
                    <span> {{ weather.temperature }}°</span>
                    <span v-for="icon in weather.icons" class="text-2xl" v-html="icon"></span>
                </div>
            </div>
        </div>
        <div
            class="absolute pin-b pin-l w-full grid items-end"
            style="
                height: calc(1.25 * var(--tile-padding));
                grid-gap: 1px;
                grid-template-columns: repeat(12, 1fr);
                opacity: .15"
        >
            <div
                v-for="rainForecast in rainForecasts"
                class="rounded-sm bg-accent"
                :style="`height:${rainForecast.rain * 100}%`"
            />
        </div>
    </tile>
</template>

<script>
import { emoji } from '../helpers';
import echo from '../mixins/echo';
import Tile from './atoms/Tile';
import weather from '../services/weather/Weather';

export default {
    components: {
        Tile,
    },

    mixins: [echo],

    props: {
        weatherCity: {
            type: String,
        },
        position: {
            type: String,
        },
    },

    data() {
        return {
            weather: {
                temperature: '',
                icons: [],
            },
            rainForecasts: [],
        };
    },

    created() {
        this.fetchWeather();
        setInterval(this.fetchWeather, 15 * 60 * 1000);
    },

    methods: {
        emoji,

        getEventHandlers() {
            return {
                'Buienradar.ForecastsFetched': response => {
                    this.rainForecasts = response.forecasts;
                },
            };
        },

        async fetchWeather() {
            const condition = await weather.forCity(this.weatherCity);

            let icons = [];

            condition.weather
                .slice(0, 1) // There's not enough room for > 1 emoji -> only display the first weather condition
                .forEach(weatherCondition => {
                    const isNight = weatherCondition.icon.includes('n');

                    const icon = weather.getEmoji(weatherCondition.id, isNight);

                    icons.push(emoji(icon));
                });

            this.weather.temperature = condition.main.temp.toFixed(1);
            this.weather.icons = icons;
        },
    },
};
</script>
