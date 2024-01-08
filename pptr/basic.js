// Puppeteer and Headless Chrome (or Firefox)
// npm init -y
// add "type":"module" to package.json
// npm install puppeteer

import puppeteer from "puppeteer";

(async () => {
    const browser = await puppeteer.launch({ headless: false });
    const page = await browser.newPage();
    page.setViewport({ width: 1600, height: 700 });
    await page.goto("https://www.google.com");
    // other actions...
    const url = await page.url();
    console.log(url);
    const content = await page.content();
    //     console.log(content);

    //     Take page screenshot
    await page.screenshot({ path: "./screens/samplegoogle.jpg" });
    await page.type('textarea[type="search"]', "Pradip Chaudhary", {
        delay: 50,
    });
    await page.waitForSelector("selector");

    await browser.close();
})();
