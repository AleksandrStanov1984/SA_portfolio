// scripts/make-pdf.cjs
const puppeteer = require("puppeteer");

(async () => {
    try {
        // URL страницы портфолио, передаём из Laravel или CLI
        const htmlUrl = process.argv[2] || "http://127.0.0.1:8000/de";

        const browser = await puppeteer.launch({
            headless: "new",
        });

        const page = await browser.newPage();

        await page.goto(htmlUrl, {
            waitUntil: "networkidle0",
        });

        const pdfBuffer = await page.pdf({
            format: "A4",
            printBackground: true,
            preferCSSPageSize: true,
            margin: { top: "0mm", right: "0mm", bottom: "0mm", left: "0mm" },
        });

        await browser.close();

        // Отдаём PDF в stdout – Laravel заберёт отсюда
        process.stdout.write(pdfBuffer);
    } catch (err) {
        console.error("❌ PDF generation error:", err);
        process.exit(1);
    }
})();
