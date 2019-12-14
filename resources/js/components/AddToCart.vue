<template>

  <div>

    <div v-if="is_added_product" class="alert alert-success alert-dismissible fade show" role="alert">
        Product added to cart successfully
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="row">
        <div class="col-2"></div>
        <div class="col-4"> Name</div>
        <div class="col-4"> Desc.</div>
        <div class="col-2"> Price</div>
    </div>

    <div class="row" v-for="product in products">
        <div class="col-2">
          <img :src="getRandomImage()"  :alt="product.name">
          </div>
        <div class="col-4">{{ product.name }}</div>
        <div class="col-4">{{ product.description }}</div>
        <div class="col-2">
            ${{product.price}}<br>
                <button type="button" class="btn btn-primary" @click="addToCart(product.id)">Add to Cart</button>
        </div>
    </div>
  </div>

</template>

<script>
    export default {
        props:['products'],
        data () {
          return {
            is_added_product:false
          }
        },
        methods:{

          getRandomImage()
          {
            return '/imgs/image'+(Math.floor(Math.random() * 5) + 1)+'.jpg';
          },
           addToCart(id)
           {

             axios.get('/cart/'+id).then(response=>{
                if (response.data=='success') {
                  this.is_added_product = true;
                }
                setTimeout(()=>{
                    this.is_added_product = false;
                },2000);

             })
           }
        }
    }
</script>
