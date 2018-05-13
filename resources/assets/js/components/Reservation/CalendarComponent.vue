<template>
    <div>
        <full-calendar
                defaultView="month"
                editable="false"
                :events="events"></full-calendar>
    </div>
</template>

<script>
export default {
    data() {
        return {
            events: [
                {
                    id: 1,
                    title  : '予約: 0組(0名)',
                    start  : '2018-05-01',
                    color: '#0000cd',
                    textColor: '#FFFFFF',
                },
                {
                    id: 2,
                    title  : '受付中: 23卓',
                    start  : '2018-05-01',
                    color: '#ffffff',
                    textColor: '#808080',
                },
            ],
            color: 'black'
        }
    }
}
</script>

<style>
    @import '~fullcalendar/dist/fullcalendar.css';
</style>
