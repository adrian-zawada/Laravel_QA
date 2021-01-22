<template>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <form class="card-body" v-if="editing" @submit.prevent="update">
                    <div class="card-title">
                        <input type="text" class="form-control form-control-lg" v-model="title">
                    </div>

                    <hr>

                    <div class="media">
                        <div class="media-body">
                            <div class="form-group">
                                <textarea v-model="body" rows="10" class="form-control" required></textarea>
                            </div>
                            <button class="btn btn-primary" :disabled="isInvalid">Update</button>
                            <button class="btn btn-outline-secondary" type="button" @click="cancel">Cancel</button>
                        </div>
                    </div>
                </form>
                <div class="card-body" v-else>
                    <div class="card-title">
                        <div class="d-flex algin-items-center">
                            <h1>{{ title }}</h1>
                            <div class="ml-auto">
                                <a href="/questions" class="btn btn-outline-secondary">Back to All Question</a>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="media">
                    <vote :model="question" name="question"></vote>

                        <div class="media-body">
                            <div v-html="bodyHtml"></div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="ml-auto">
                                        <a v-if="authorize('modify', question)" @click.prevent="edit" class="btn btn-sm btn-outline-info">Edit</a>
                                        <button v-if="authorize('deleteQuestion')" @click="destroy" class="btn btn-sm btn-outline-danger">DELETE</button>
                                    </div>
                                </div>
                                <div class="col-4"></div>
                                <div class="col-4">
                                    <user-info :model="question" label="Asked"></user-info>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import UserInfo from './UserInfo';
import Vote from './Vote';
import modification from '../mixins/modification';

export default {
    components: { UserInfo, Vote },

    props: ['question'],

    mixins: [modification],

    data () {
        return {
            title: this.question.title,
            body: this.question.body,
            bodyHtml: this.question.body_html,
            editing: false,
            id: this.question.id,
            beforeEditCache: {}
        }
    },

    computed: {
        isInvalid () {
            return this.body.lenght < 10 || this.title.lenght < 10;
        },

        endpoint () {
            return `/questions/${this.id}`;
        }
    },

    methods: {
        setEditCache () {
            this.beforeEditCache = {
                body: this.body,
                title: this.title
            };
        },

        restoreFromCache () {
            this.body = this.beforeEditCache.body;
            this.title = this.beforeEditCache.title;
        },

        payload () {
            return {
                body: this.body,
                title: this.title
            };
        },

        delete () {
            axios.delete(this.endpoint)
                .then(({data}) => {
                    this.$toast.success(data.message, "Success", { timeout: 2000 });
                });
                setTimeout(() => {
                    window.location.href = "/questions";
                }, 3000);
        }
    }
}
</script>