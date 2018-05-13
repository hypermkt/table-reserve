<template>
    <div>
        <full-calendar
                :config="config"
                :events="events"
        ></full-calendar>
    </div>
</template>

<script>
export default {
    data() {
        return {
            events: [
                {
                    title: "やまだ たろう / 2名",
                    resourceId: "a1",
                    start: "2018-05-13 10:00:00",
                    end: "2018-05-13 11:00:00"
                },
                {
                    title: "やまだ はなこ/ 4名",
                    resourceId: "a2",
                    start: "2018-05-13 13:00:00",
                    end: "2018-05-13 14:00:00"
                }
            ],
            config: {
                defaultView: "timelineDay",
                resourceLabelText: "Rooms",
                resources: [
                    {
                        id: "a",
                        title: "小テーブル",
                        children: [
                            {
                                id: "a1",
                                title: "卓1"
                            },
                            {
                                id: "a2",
                                title: "卓2"
                            }
                        ]
                    }
                ]
            }
        }
    }
}
</script>
