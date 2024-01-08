// Puppeteer and Headless Chrome (or Firefox)
// npm init -y
// add "type":"module" to package.json
// npm install puppeteer

import puppeteer from "puppeteer";

(async () => {
    const browser = await puppeteer.launch({ headless: false });
    const page = await browser.newPage();
    await page.goto("https://www.google.com");
    // other actions...
    await browser.close();
})();
