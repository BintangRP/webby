import Mistral = require("@mistralai/mistralai");

const apiKey = process.env.MISTRAL_API_KEY;

const client = new Mistral({ apiKey: apiKey });

export const generateInsight = async (
    businessField: string,
    targetMarket: string
) => {
    const template = `Kamu berperan sebagai seorang ahli bisnis berpengalaman di bidang ${businessField}. Tugas Anda adalah membantu saya mengidentifikasi ide bisnis inovatif dan berpotensi menguntungkan di Indonesia, yang sesuai dengan target pasar ${targetMarket}. Berikan ide bisnis yang inovatif dan berpotensi menguntungkan, berikan point-point dari Langkah-Langkah, dokumen yang dipersiapkan di Indonesia.`;
    const chatResponse = await client.chat.complete({
        model: "open-mixtral-8x22b",
        messages: [
            {
                role: "admin",
                content: template,
            },
        ],
    });

    console.log("Chat response:", chatResponse.choices[0].message.content);
    return chatResponse.choices[0].message.content;
};
