<template>
  <div>
    <h3 class="text-center">Edit1</h3>
    <div class="row">
      <errors-modal v-if="errors" :errors="errors"  @close="errors=null"></errors-modal>
      <div class="col-md-6">
        <form @submit.prevent="update">
          <div class="form-group">
            <label>Code</label>
            <input type="text" class="form-control" v-model="product.code">
          </div>
          <div class="form-group">
            <label>Detail</label>
            <input type="text" class="form-control" v-model="product.comment">
          </div>
          <div class="form-group">
            <label>Serial</label>
            <input type="text" class="form-control" v-model="product.serial">
          </div> <br>
          <select v-model="product.equipment_type_id">
            <option v-for="code_type in code_types" v-bind:value="code_type.id"  >{{ code_type.code }}</option>
          </select>
          <button type="submit" class="btn btn-primary">Update</button>
          <router-link :to="{name: 'home'}" class="btn btn-success">Back</router-link>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import ErrorsModal from "./ErrorsModal";
export default {
    components:{
        ErrorsModal
    },

    data() {
        return {
            product: {},
            code_types: {},
            errors: null,
        }
    },
    created() {
        this.axios
            .get(`/api/equipment/${this.$route.params.id}`)
            .then((res) => {
                this.product = res.data.data;
            });
        this.axios
            .get(`/api/equipment-type`)
            .then((res) => {
                console.log(res.data)
                this.code_types = res.data;
                console.log(this.code_types)
            });

    },
    methods: {
        update() {
            this.axios
                .patch(`/api/equipment/${this.$route.params.id}`, this.product)
                .then((res) => {
                    this.$router.push({ name: 'home' });
                }) .catch(err => {
                if (err.response.status === 422) {
                    this.errors = err.response.data.errors;
                }
            });
        }
    }
}
</script>
