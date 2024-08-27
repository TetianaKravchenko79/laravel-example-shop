<template>
    <div class="row">
        <div class="col-4 col-lg-4 center">
            <div class="cart-btn">
                <button
                    class="btn btn-danger w-100"
                    @click="(event) => clearCart(carts)"
                >
                    Clear all Cart
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    props: ["carts"],
    data: function () {
        return {
            //...
        };
    },
    mounted() {
        //...
    },
    methods: {
        clearCart(carts) {
            event.preventDefault();
            let self = this; //!!!self - becouse axios
            axios
                .post("/clearall", { carts: carts })
                .then(function (resp) {
                    console.log(resp.data);

                    // self.handleCart(resp.data); //!!!self - becouse axios
                    self.$store.commit("setCarts", resp.data);
                })
                .catch(function (resp) {
                    console.log(resp); //!!!js-error

                    if (resp.response) {
                        //!!!back-error
                        console.log(resp.response.data); //...message, ...file, ...line
                    }
                    alert("Could not delete cart");
                });
        },
    },
};
</script>
