<template lang="">
  <div class="media post">
        <div class="d-flex flex-column vote-controls">
             <vote :model="answer" name="answer"></vote>
        </div>


        <div class="media-body">
            <form v-if="editing" @submit.prevent="update">
                <div class="form-group">
                  <textarea class="form-control" v-model="body" rows="10" required></textarea>
                </div>
                <button type="submit"  class="btn btn-primary" :disabled="isInvalid">Update</button>
                <button type="button" @click="cancel" class="btn btn-outline-secondary">Cancel</button>
            </form>
            <div v-else>
                <div v-html="bodyHtml"></div>

                <div class="row">
                    <div class="col-4">
                        <div class="ml-auto">

                                <a v-if="authorize('modify', answer)" @click.prevent="edit" class="btn btn-sm btn-outline-info">Edit</a>

                                <button v-if="authorize('modify', answer)" type="submit" class="btn btn-sm btn-danger" @click="destroy">Delete</button>

                        </div>

                    </div>
                    <div class="col-4"></div>
                    <div class="col-4">

                        <user-info :model="answer" label="Answered"></user-info>
                        </div>

                </div>
            </div>


        </div>
    </div>
</template>
<script>
import Vote from "./Vote.vue";
import UserInfo from "./UserInfo.vue";
import modification from "../mixins/modification.js";

export default {
  props: ["answer"],

  mixins: [modification],

  components: { Vote, UserInfo },
  data() {
    return {
      body: this.answer.body,
      bodyHtml: this.answer.body_html,
      id: this.answer.id,
      questionId: this.answer.question_id,
      beforeEditCase: null
    };
  },
  methods: {
    setEditCache() {
      this.beforeEditCase = this.body;
    },
    resetEditCache() {
      this.body = this.beforeEditCase;
    },
    payload() {
      return {
        body: this.body
      };
    },
    delete() {
      axios.delete(this.endpoint).then(res => {
        this.$toast.success(res.data.message, "Success", {
          timeout: 3000
        });
        this.$emit("deleted");
      });
    }
  },
  computed: {
    isInvalid() {
      return this.body.length < 10;
    },
    endpoint() {
      return `/questions/${this.questionId}/answers/${this.id}`;
    }
  }
};
</script>
