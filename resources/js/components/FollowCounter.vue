<template>
    <div>
        <div class="pr-5">
            <strong v-text="followsCount"></strong> followers
        </div>
    </div>
</template>

<script>
export default {
    props: ["userId"],

    mounted() {
        this.getFollowsCount();
    },

    data: function() {
        return {
            status: null
        };
    },

    methods: {
        getFollowsCount() {
            const fetch = axios.get(`/follow/${this.userId}`).then(res => {
                this.status = res.data;
            });
        }
    },
    computed: {
        followsCount() {
            return this.status;
        }
    }
};
</script>
