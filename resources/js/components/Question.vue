<template>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
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
                                <div class="col-4"></div>
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
export default {
    props: ['question'],

    data () {
        return {
            title: this.question.title,
            body: this.question.body,
            bodyHtml: this.question.body_html
        }
    }
}
</script>