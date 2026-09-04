import type { Metadata } from "next";
import { Inter } from "next/font/google";
import "./globals.css";

const inter = Inter({
  subsets: ["latin"],
  variable: "--font-inter",
});

export const metadata: Metadata = {
  title: "Kamal Zakoune Portfolio",
  description: "Premium 3D Portfolio Website",
};

export default function RootLayout({ children }: LayoutProps<"/">) {
  return (
    <html lang="en" className={`dark ${inter.variable} h-full antialiased`}>
      <body className={`${inter.className} min-h-full bg-black text-white`}>
        {children}
      </body>
    </html>
  );
}
