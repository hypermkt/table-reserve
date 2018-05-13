<template>
    <div>
        <table>
            <tr>
                <td>予約ページ公開設定</td>
                <td>
                    <el-switch
                            v-model="release_state"
                            @change="updateReleaseState"
                            active-color="#13ce66"
                            inactive-color="#ff4949">
                    </el-switch>
                </td>
            </tr>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            release_state: false
        }
    },
    props: ['restaurantId'],
    created() {
        console.log("restaurantId"  + this.restaurantId);
        this.fetchRestaurant();
    },
    methods: {
        fetchRestaurant() {
            axios.get('/api/v1/restaurants/' + this.restaurantId).then((response) => {
                this.release_state = response.data.release_state == 'public';
            })
        },
        updateReleaseState() {
            console.log("updateReleaseState called");
        }
    }
}
</script>
