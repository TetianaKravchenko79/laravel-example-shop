import React from "react";
import axios from "axios";
import { store } from "../reducer";

export default class ClearDialog extends React.Component {
    constructor(props) {
        super(props);

        this.clearCart = this.clearCart.bind(this);

        this.state = {
            //..
        };
    }

    componentDidMount() {}

    clearCart(event) {
        event.preventDefault();
        let self = this; //!!!self - becouse axios
        axios
            .post("/clearall", { carts: this.props.carts })
            .then(function (resp) {
                console.log(resp.data);

                self.handleCart(resp.data); //!!!self - becouse axios
            })
            .catch(function (resp) {
                console.log(resp); //!!!js-error

                if (resp.response) {
                    //!!!back-error
                    console.log(resp.response.data); //...message, ...file, ...line
                }
                alert("Could not delete cart");
            });
    }

    handleCart(carts) {
        // this.props.handleCart(carts);
        store.dispatch({ type: "CHANGE_STATE_CARTS", cartsAfterRemove: carts });
    }

    render() {
        return (
            <div className="row">
                <div className="col-4 col-lg-4 center">
                    <div className="cart-btn">
                        <button
                            className="btn btn-danger w-100"
                            onClick={this.clearCart}
                        >
                            Clear all Cart
                        </button>
                    </div>
                </div>
            </div>
        );
    }
}
