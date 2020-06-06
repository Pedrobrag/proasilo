function getAllParans() {
    url = window.location.href
    br = url.split("?")
    if (br[1] != undefined) {
        array = []
        multiples = br[1].split("&")
        for (i = 0; i < multiples.length; i++) {
            par = multiples[i].split("=")
            a = par[0]
            b = par[1]
            array.push([a, b])
        }
        return array;
    }
}

function getParam(param) {
    todos = getAllParans()
    for (i = 0; i < todos.length; i++) {
        if (todos[i][0] == param) {
            return todos[i][1]
        }
    }
}

function paramExist(param) {
    all = getAllParans()
    if (all == undefined) { return false } else {
        for (i = 0; i < all.length; i++) {
            if (all[i][0] == param) {
                return true;
            }
        }
        return false;
    }
}

function removeAllParans(except) {
    window.history.replaceState(null, null, window.location.pathname);

}