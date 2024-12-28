import { Bot } from "grammy";

const bot = new Bot("8105641070:AAFe-5A2ayDIqOpEHZt3KdSb5JApgBFdWk8"); // <-- put your bot token between the ""

bot.command("start", (ctx) => ctx.reply("Welcome! Up and running."));

bot.start();

bot.command("pay", (ctx) => {
  return ctx.replyWithInvoice(
    "Producto de prueba",  // Título del producto
    "Descripción de prueba",  // Descripción del producto
    "{}",  // Carga útil del producto
    "XTR",  // Moneda (XTR es ficticia, usa la correcta)
    [{ amount: 100, label: "Producto de prueba" }],  // Precio en céntimos
  );
});
