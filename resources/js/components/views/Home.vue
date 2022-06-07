<template>
  <div>
    <h2 class="text-center">Products List</h2>

    <a></a>
    <table class="table">
      <thead>
      <tr>
        <th>ID</th>
        <th>Code</th>
        <th>Serial</th>
        <!-- <th>Actions</th> -->
      </tr>
      </thead>
      <tbody>
      <tr v-for="product in equipments" :key="product.id">
        <td>{{ product.id }}</td>
        <td>{{ product.code }}</td>
        <td>{{ product.serial }}</td>
        <td>
          <div class="btn-group" role="group">
            <router-link :to="{name: 'edit', params: { id: product.id }}" class="btn btn-success">Edit</router-link>
            <button class="btn btn-danger" @click="deleteProduct(product.id)">Delete</button>
          </div>
        </td>
      </tr>
      </tbody>
    </table>
  </div>
</template>


<script>
export default {
    data() {
        return {
            equipments: []
        }
    },
    mounted() {
        this.getAll()
    },
    methods: {
        getAll() {
            this.axios
                .get('/api/equipment')
                .then(response => {
                    this.equipments = response.data.data;
                    console.log(this.equipments)
                });
        }
    }
}
</script>
