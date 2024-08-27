import React from "react";
import ReactDOM from "react-dom";
import RemoveDialog from "./RemoveComponent";
import ClearDialog from "./ClearComponent";
import { store } from "../reducer";
import { cartNativeJsObj } from "../cartNativeJs";

class CartDialog extends React.Component {
    constructor(props) {
        super(props);
        this.handleCart = this.handleCart.bind(this);

        this.state = {
            carts: window.carts,
        };
    }

    componentDidMount() {
        console.log(this.state.carts);
        store.subscribe(() => this.handleStore(store.getState()));
    }

    handleStore(store) {
        this.handleCart(store.cartsReducer);
    }

    handleCart(carts) {
        this.setState({
            carts: carts,
        });
        // document.querySelector("#lblCartCount").innerText = carts.length;
        // cartNativeJsObj.countChange(carts.length);
        cartNativeJsObj.selector = "#lblCartCount";
        cartNativeJsObj.changeValueSelector(carts.length);
    }

    render() {
        return (
            <div>
                <div id="pannel">
                    {this.state.carts.map((item, key) => (
                        <div className="row" key={key}>
                            <div className="col-xl-3 border cart_product_img text-center p-2">
                                <img
                                    src={"/img/" + item.product.image}
                                    alt="Product"
                                />
                            </div>
                            <div className="col-xl-3 border cart_product_name p-2">
                                <a href={"/product/" + item.product.id}>
                                    <h3>{item.product.name}</h3>
                                </a>

                                {/* <h5>{item.product.name}</h5> */}
                            </div>{" "}
                            <div className="col-xl-2 border cart_product_price p-2">
                                <h5>{item.product.price}</h5>
                            </div>{" "}
                            <div className="col-xl-2 border cart_product_price p-2">
                                <h5>{item.size.name}</h5>
                            </div>
                            <div className="col-xl-2 border text-center p-5">
                                <RemoveDialog
                                    cartId={item.id}
                                    productId={item.product.id}
                                    sizeId={item.size.id}
                                    handleCart={this.handleCart}
                                />
                            </div>
                        </div>
                    ))}
                </div>
                <ClearDialog
                    handleCart={this.handleCart}
                    carts={this.state.carts}
                />
            </div>
        );
    }
}

const elem = document.querySelector(".cart_block");

if (elem) {
    ReactDOM.render(<CartDialog />, elem);
}
