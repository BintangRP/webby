"use strict";
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", { value: true });
exports.generateInsight = void 0;
// import Mistral = require("@mistralai/mistralai");
const mistralai_1 = __importDefault(require("@mistralai/mistralai"));
const apiKey = process.env.MISTRAL_API_KEY;
const client = new mistralai_1.default({ apiKey: apiKey });
const generateInsight = async (businessField, targetMarket) => {
    const template = `Kamu berperan sebagai seorang ahli bisnis berpengalaman yang mempunyai banyak assets yang baik dan selalu dapat melihat peluang yang ada pada pasar. Kamu berperan sebagai seorang ahli bisnis berpengalaman di bidang ${businessField}. Tugas Anda adalah membantu saya mengidentifikasi ide bisnis inovatif dan berpotensi menguntungkan di Indonesia, yang sesuai dengan target pasar ${targetMarket}. Berikan ide bisnis yang inovatif dan berpotensi menguntungkan, berikan point-point dari Langkah-Langkah, dokumen yang dipersiapkan di Indonesia.`;
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
exports.generateInsight = generateInsight;
