import puppeteer from "puppeteer";

(async () => {
    const browser = await puppeteer.launch({
        headless: false,
        executablePath:
            "C:\\Program Files\\Google\\Chrome\\Application\\chrome.exe",
        args: ["--start-maximized"],
    });
    const username = "iamyounz";
    const password = "Loveyourself321";
    const page = await browser.newPage();
    await page.goto("https://autofaucet.org/auth/signin");

    await page.type('input[id="l-form-username"]', username, { delay: 50 });
    await page.type('input[id="l-form-password"]', username, { delay: 50 });

    //     await page.waitForNavigation({ waitUntil: "load" });
    const recaptchabtn = await page.$("#recaptcha");
    const boundingBox = await recaptchabtn.boundingBox();
    console.log(recaptchabtn);

    //     await page.mouse.move(
    //         boundingBox.x + boundingBox.width / 2,
    //         boundingBox.y + boundingBox.height / 2
    //     );

    //     const element = await page.$("h1");
    //     const boundingBox = await element.boundingBox();
    //     await page.mouse.move(
    //         boundingBox.x + boundingBox.width / 2,
    //         boundingBox.y + boundingBox.height / 2
    //     );

    const submitButton = await page.$("#submit");
    await page.click(submitButton);
    await page.screenshot({ path: "./screens/mousemove.png" });

    await browser.close();
})();
