import axios from "axios";

async function getEnvVariables() {
    const response = await fetch("/VnIpXHII39761Fu4aFvR");
    if (!response.ok) {
        throw new Error("Failed to fetch environment variables");
    }
    const data = await response.json();
    return data;
}

export const generateInsight = async (businessField, targetMarket) => {
    try {
        const envVariables = await getEnvVariables();
        const apiKey = envVariables.api_url;
        const agentId = envVariables.agent_id;

        const client = axios.create({
            baseURL: "https://api.mistral.ai/v1",
            headers: {
                Authorization: `Bearer ${apiKey}`,
                "Content-Type": "application/json",
            },
        });

        const template = `Kamu berperan sebagai seorang ahli bisnis berpengalaman yang mempunyai banyak assets yang baik dan selalu dapat melihat peluang yang ada pada pasar. Kamu berperan sebagai seorang ahli bisnis berpengalaman di bidang ${businessField}. Tugas Anda adalah membantu saya mengidentifikasi ide bisnis inovatif dan berpotensi menguntungkan di Indonesia, yang sesuai dengan target pasar ${targetMarket}. Berikan ide bisnis yang inovatif dan berpotensi menguntungkan, berikan point-point dari Langkah-Langkah, dokumen yang dipersiapkan di Indonesia.`;

        const chatResponse = await client.post("/chat/completions", {
            model: "open-mixtral-8x7b",
            messages: [
                {
                    role: "user",
                    content: template,
                },
            ],
        });

        const agentMessage = chatResponse.data.choices[0].message.content;
        return agentMessage;
    } catch (error) {
        console.error("Error generating insight:", error);
        throw error;
    }
};
