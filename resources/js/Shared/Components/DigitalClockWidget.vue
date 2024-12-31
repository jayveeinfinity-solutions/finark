<template>
    <div class="text-dark fw-bold pt-2 px-3 rounded" style="line-height: .7 !important;">
        <span class="fs-1">{{ currentTime }}</span><br>
        <p class="text-end fs-6">{{ timezone }}</p>
    </div>
</template>

<script>
    import { format } from 'date-fns';

    const getCurrentTime = () => format(new Date(), 'h:mm:ss a');

    export default {
        data() {
            return {
                currentTime: getCurrentTime()
            }
        },
        methods: {
            updateCurrentTime() {
                this.currentTime = getCurrentTime();
            }
        },
        created() {
            setInterval(() => this.updateCurrentTime(), 1000);
        },
        props: {
            timezone: String
        }
    }
</script>