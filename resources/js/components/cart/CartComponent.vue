<template>
    <div>
        <div class="row" v-for="(cart, index) in carts">
            <div class="col-xl-3 border cart_product_img text-center p-2">
                <img :src="'img/' + cart.product.image" alt="Product" />
            </div>
            <div class="col-xl-2 border cart_product_name p-2">
                <a :href="'/product/' + cart.product.id"
                    ><h5>{{ cart.product.name }}</h5></a
                >
            </div>
            <div class="col-xl-2 border cart_product_price p-2">
                <h5>{{ cart.product.price }}</h5>
            </div>

            <div class="col-xl-2 border cart_product_price p-2">
                <h5>{{ cart.size.name }}</h5>
            </div>
            <div class="col-xl-2 border cart_product_price p-2">
                <h5>{{ cart.qty }}</h5>
            </div>
            <RemoveComponent
                :cartId="cart.id"
                :productId="cart.product.id"
                :sizeId="cart.size.id"
                :qty="cart.qty"
            />
        </div>

        <ClearComponent :carts="carts" />
    </div>
</template>

<script>
import axios from "axios";
import { cartNativeJsObj } from "../cartNativeJs";
import RemoveComponent from "./RemoveComponent.vue";
import ClearComponent from "./ClearComponent.vue";

export default {
    data: function () {
        return {
            carts: window.carts,
        };
    },
    components: {
        RemoveComponent,
        ClearComponent,
    },
    mounted() {
        console.log(window.carts);

        this.$store.subscribe((mutation, state) => {
            console.log(mutation.type);

            if (mutation.type == "setCarts")
                this.handleCart(this.$store.getters.getCarts); //!!!getter
        });
    },
    methods: {
        handleCart(carts) {
            this.carts = carts;
            cartNativeJsObj.selector = "#lblCartCount";

            cartNativeJsObj.changeValueSelector(carts.length);
        },
    },
};
</script>
