export type Job = {
  company: string;
  role: string;
  years: string;
  accent: "cyan" | "purple" | "green";
  logo: string;
};

export type Project = {
  name: string;
  desc: string;
  accent: string;
  image: string;
};

export const profile = {
  name: "Kamal Zakoune",
  age: 39,
  title: "Senior Full-Stack & Automation Engineer",
  stack: "Next.js • Laravel • React Native • Python • n8n • AI Prompting",
  email: "kmldeveloper@gmail.com",
  github: "https://github.com/kmldev",
  location: "Casablanca, Morocco",
};

export const jobs: Job[] = [
  {
    company: "BLUE DIGITAL",
    role: "Full-Stack Developer",
    years: "2025 - May 2026",
    accent: "cyan",
    logo: "/logos/bluedigital.webp",
  },
  {
    company: "HELLOWAT",
    role: "Media Buyer",
    years: "2020 - 2021",
    accent: "purple",
    logo: "/logos/hellowat.webp",
  },
  {
    company: "H2O SERVICES",
    role: "IT / Web",
    years: "2019 - 2020",
    accent: "green",
    logo: "/logos/h2o-services.webp",
  },
  {
    company: "OPTIMGOV",
    role: "Full-Stack & Mobile Developer",
    years: "2018 - 2019",
    accent: "cyan",
    logo: "/logos/optimgov.webp",
  },
  {
    company: "IRIZAR",
    role: "IT Expert (Freelance)",
    years: "2014 - 2024",
    accent: "purple",
    logo: "/logos/irizar.webp",
  },
];

export const projects: Project[] = [
  {
    name: "Eduex.digital",
    desc: "Plateforme LMS IA pour organismes de formation",
    accent: "#8B5CF6",
    image: "/textures/eduex.webp",
  },
  {
    name: "CITYQUEST by Yango",
    desc: "Street-level QR Code Game Scanner in Casablanca",
    accent: "#22d3ee",
    image: "/textures/cityquest.webp",
  },
  {
    name: "EVONPOWER",
    desc: "Management system for electric charging points",
    accent: "#a855f7",
    image: "/textures/evonpower.webp",
  },
  {
    name: "OVOWPP.COM",
    desc: "WhatsApp Marketing SaaS & CRM",
    accent: "#4ade80",
    image: "/textures/ovowpp.webp",
  },
];

export const navItems = [
  { href: "#hero", label: "Hero" },
  { href: "#experience", label: "Parcours" },
  { href: "#projects", label: "Projects" },
  { href: "#contact", label: "Contact" },
] as const;

export const cinematicEase = [0.22, 1, 0.36, 1] as const;
