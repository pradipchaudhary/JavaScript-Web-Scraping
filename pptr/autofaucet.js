// Algo
// 1. goto https://autofaucet.org/auth/signin
// 2. type username and password in 'input[id="username"]' 'input[id="password"]'
// 3. click reCapatch 'span[id="recaptcha-anchor"]' button
// 4. click sing in button 'button[type="submit"]'

// import puppeteer from "puppeteer-core";
import puppeteer from "puppeteer-extra";
import RecaptchaPlugin from "puppeteer-extra-plugin-recaptcha";
// const RecaptchaPlugin = require("puppeteer-extra-plugin-recaptcha");
puppeteer.use(
    RecaptchaPlugin({
        provider: {
            id: "2captcha",
            token: "903604ccf4e735c798a6ff6c106cdf89", // REPLACE THIS WITH YOUR OWN 2CAPTCHA API KEY ⚡
        },
        visualFeedback: true, // colorize reCAPTCHAs (violet = detected, green = solved)
    })
);

(async () => {
    const browser = await puppeteer.launch({
        headless: false,
        executablePath:
            "C:\\Program Files\\Google\\Chrome\\Application\\chrome.exe",
        args: ["--start-maximized"],
    });

    let pageUrl = "https://autofaucet.org/auth/signin";
    const username = "iamyounz";
    const password = "Loveyourself321";
    const page = await browser.newPage();
    await page.goto(pageUrl);

    //     await page.waitForSelector('input[id="username"]');
    // await page.type('input[id="l-form-username"]', username, { delay: 50 });
    // await page.type('input[id="l-form-password"]', password, { delay: 50 });

    await page.solveRecaptchas();

    await Promise.all([
        page.waitForNavigation(),
        page.click(`button[type="submit"]`),
    ]);
    await page.screenshot({ path: "full_page_screenshot.png", fullPage: true });

    // await page.screenshot({ path: "./screens/sample.jpg" });

    await browser.close();
})();
