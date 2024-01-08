import puppeteer from "puppeteer";

(async () => {
    const browser = await puppeteer.launch({ headless: false });
    const page = await browser.newPage();
    await page.goto("https://www.youtube.com/");
    await page.waitForNetworkIdle();
    await page.screenshot({
        path: "./screens/simpleyoutubefullpage.jpg",
        fullPage: true,
    });

    await browser.close();
})();
