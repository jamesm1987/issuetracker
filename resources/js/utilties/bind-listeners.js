export default function bindListener(listenFor, selector, callback) {
    document.addEventListener(listenFor, (event) => {
        if (event.target.matches(selector)) {
            callback(event)
        }
    })
}