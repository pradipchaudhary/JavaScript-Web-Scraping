import puppeteer from "puppeteer-core";

(async () => {
    const browser = await puppeteer.launch({
        headless: false,
        executablePath:
            "C:\\Program Files\\Google\\Chrome\\Application\\chrome.exe",
        args: ["--start-maximized"],
    });

    let pageUrl = "https://www.linkbox.to/login";
    const page = await browser.newPage();
    await page.goto(pageUrl);

    await page.waitForSelector('input[type="radio"]');
    await page.click('input[type="radio"]');
    await page.click('span[role="ch');

    await page.screenshot({ path: "./screens/sample.jpg" });

    await browser.close();
})();
