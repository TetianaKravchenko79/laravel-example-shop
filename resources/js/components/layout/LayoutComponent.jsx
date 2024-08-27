import React from "react";
import ReactDOM from "react-dom";
import axios from "axios";
import Swal from "sweetalert2";

class LayoutDialog extends React.Component {
    constructor(props) {
        super(props);

        this.handleMail = this.handleMail.bind(this);
        this.clickMailer = this.clickMailer.bind(this);

        this.state = {
            email: "",
        };
    }

    componentDidMount() {
        //...
    }

    handleMail(event) {
        this.setState({
            email: event.target.value,
        });
    }

    clickMailer() {
        let self = this; //!!!self - becouse axios
        axios
            .post("/mailer", {
                email: this.state.email,
            })
            .then(function (resp) {
                console.log(resp.data);

                if (resp.data.mail) {
                    self.setState({
                        //!!!self

                        email: "",
                    });
                    Swal.fire({
                        title: "Сongratulations!",
                        text: "Your message has been sending successfully!",
                        icon: "success",
                    });
                } else {
                    Swal.fire({
                        title: "Oops!",
                        text: "There is any mistake!",
                        icon: "error",
                    });
                }
            })
            .catch(function (resp) {
                console.log(resp);
                alert("Could not mail message");
            });
    }

    render() {
        return (
            <div>
                <input
                    type="email"
                    value={this.state.email}
                    name="email"
                    className="nl-email"
                    placeholder="Your E-mail"
                    onChange={this.handleMail}
                />
                <input
                    type="button"
                    className="button_substribe"
                    value="Subscribe"
                    onClick={this.clickMailer}
                />
            </div>
        );
    }
}

const elem = document.querySelector(".newsletter-form");

if (elem) {
    ReactDOM.render(<LayoutDialog />, elem);
}
