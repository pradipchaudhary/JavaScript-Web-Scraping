const puppeteer = require("puppeteer");

const loginLink = "https://payup.video/signin/";
const username = "iamyounz";
const password = "Loveyourself321";

let browserOpen = puppeteer.launch({
    headless: false,
    args: ["--start-maximized"],
    debuggingPort: null,
});

let page;

browserOpen
    .then(function (browserObject) {
        let browserOpenPromise = browserObject.newPage();
        return browserOpenPromise;
    })
    .then(function (newTab) {
        page = newTab;
        let hackerRankOpenPromise = newTab.goto(loginLink);
        return hackerRankOpenPromise;
    })
    .then(function () {
        let clickLoginLink = page.click(
            ".btn.rounded-pill.brd-gray.hover-blue4"
        );
        return clickLoginLink;
    });

// .then(function () {
//     let reCaptchaClicked = waitAndClick(
//         ".btn.rounded-pill.brd-gray.hover-blue4",
//         page
//     );

//     return reCaptchaClicked;
// });

function waitAndClick(selector, cPage) {
    return new Promise(function (resolve, reject) {
        let waitForModelPromise = cPage.waitForSelector(selector);
        waitForModelPromise
            .then(function () {
                let clickModel = cPage.click(selector);
                return clickModel;
            })
            .then(function () {
                resolve();
            })
            .catch(function (err) {
                reject();
            });
    });
}

// .then(function () {
//     let usernameIsEnter = page.type('input[name="username"]', username, {
//         delay: 50,
//     });
//     return usernameIsEnter;
// })
// .then(function () {
//     let passwordIsEnter = page.type('input[name="password"]', password, {
//         delay: 50,
//     });
//     return passwordIsEnter;
// })
