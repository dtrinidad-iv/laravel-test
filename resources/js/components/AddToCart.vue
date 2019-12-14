<template>


    <div class="row">
        <div class="col-2">
          <img :src="getRandomImage()"  :alt="product.name">
          </div>
        <div class="col-4">{{ product.name }}</div>
        <div class="col-4">{{ product.description }}</div>
        <div class="col-2">
            ${{product.price}}<br>
            <a :href="'/cart/'+product.id">
                <button type="button" class="btn btn-primary">Add to Cart</button>
            </a>
        </div>
    </div>
</template>

<script>
    export default {
        props:['product'],

        methods:{

          getRandomImage()
          {
            return '/imgs/image'+(Math.floor(Math.random() * 5) + 1)+'.jpg';
          }
        }
    }
</script>
