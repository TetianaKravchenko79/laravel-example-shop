export default class baseNativeJsClass {
    constructor() {
        this.selector = null;
        //...
    }

    // countChange(newCount) {
    //     document.querySelector("#lblCartCount").innerText = newCount;
    // }

    changeValueSelector(value) {
        document.querySelector(this.selector).innerText = value;
    }

    //...other methods for base(all pages)
}
