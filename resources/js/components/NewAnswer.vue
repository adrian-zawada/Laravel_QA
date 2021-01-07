<template>
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h3>Your Answer</h3>
                    </div>
                    <hr>
                    <form>
                        <div class="form-group">
                            <textarea class="form-control" required v-model="body" name="body" rows="7"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" :disabled="isInvalid" class="btn btn-lg btn-outline-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data () {
        return {
            body: ''
        }
    },

    computed: {
        isInvalid () {
            return !this.signedIn || this.body.length < 10;
        }
    },
}
</script>