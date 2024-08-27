<template>
    <div class="col-xl-1 border text-center p-2">
        <button
            class="btn btn-danger listbuttonremove"
            id="cart.id"
            href="#"
            @click="removeCart(cartId, productId, sizeId, qty)"
        >
            <i class="fa fa-trash-o" aria-hidden="true"></i>
        </button>
    </div>
</template>

<script>
import axios from "axios";

export default {
    props: ["cartId", "productId", "sizeId", "qty"],
    data: function () {
        return {
            //...
        };
    },
    mounted() {
        //...
    },
    methods: {
        removeCart(id, productId, sizeId, qty) {
            event.preventDefault();
            let self = this; //!!!self - becouse axios
            axios
                .post("/clearone", {
                    id: id,
                    product_id: productId,
                    size_id: sizeId,
                    qty: qty,
                })
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
