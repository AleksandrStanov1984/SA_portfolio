const puppeteer = require('puppeteer');
const fs = require('fs');

(async () => {
    const url        = process.argv[2];
    const outputPath = process.argv[3];

    if (!url || !outputPath) {
        console.error("Missing arguments: url, outputPath");
        process.exit(1);
    }

    try {
        const browser = await puppeteer.launch({
            headless: "new",
            args: [
                '--no-sandbox',
                '--disable-gpu',
                '--disable-setuid-sandbox',
                '--disable-dev-shm-usage'
            ]
        });

        const page = await browser.newPage();
        await page.goto(url, { waitUntil: 'networkidle0', timeout: 120000 });

        const pdf = await page.pdf({
            format: 'A4',
            printBackground: true,
            margin: {
                top: '20px',
                bottom: '20px',
                left: '12px',
                right: '12px'
            }
        });

        fs.writeFileSync(outputPath, pdf);
        await browser.close();
        process.exit(0);

    } catch (err) {
        console.error(err);
        process.exit(1);
    }
})();
