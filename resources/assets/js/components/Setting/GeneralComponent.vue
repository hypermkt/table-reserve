<template>
    <div>
        <table>
            <tr>
                <td>予約ページ公開設定</td>
                <td>
                    <el-switch
                            v-model="value2"
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
            value2: false
        }
    }
}
</script>
