"use client";

import { cinematicEase, navItems, profile } from "@/lib/content";
import { motion } from "framer-motion";
import { useEffect, useState } from "react";

export default function Navigation() {
  const [active, setActive] = useState("#hero");

  useEffect(() => {
    const sections = navItems
      .map((item) => document.querySelector(item.href))
      .filter((node): node is Element => Boolean(node));

    const observer = new IntersectionObserver(
      (entries) => {
        const visible = entries
          .filter((entry) => entry.isIntersecting)
          .sort((a, b) => b.intersectionRatio - a.intersectionRatio)[0];
        if (visible?.target.id) setActive(`#${visible.target.id}`);
      },
      { threshold: [0.35, 0.55] },
    );

    sections.forEach((section) => observer.observe(section));
    return () => observer.disconnect();
  }, []);

  return (
    <motion.header
      initial={{ y: -24, opacity: 0 }}
      animate={{ y: 0, opacity: 1 }}
      transition={{ duration: 0.7, ease: cinematicEase }}
      className="fixed top-3 right-0 left-0 z-40 flex justify-center px-4"
    >
      <nav className="flex w-full max-w-3xl items-center justify-between rounded-full border border-cyan-400/20 bg-black/55 px-4 py-2 shadow-[0_0_40px_rgba(34,211,238,0.12)] backdrop-blur-xl">
        <a href="#hero" className="font-semibold tracking-wide text-cyan-300">
          {profile.name.split(" ")[0]}
          <span className="text-purple-400">.dev</span>
        </a>
        <ul className="flex items-center gap-1 text-sm sm:gap-2">
          {navItems.map((item) => {
            const isActive = active === item.href;
            return (
              <li key={item.href}>
                <a
                  href={item.href}
                  className={`relative rounded-full px-3 py-1.5 transition ${
                    isActive ? "text-white" : "text-zinc-400 hover:text-cyan-200"
                  }`}
                >
                  {isActive ? (
                    <motion.span
                      layoutId="nav-pill"
                      className="absolute inset-0 rounded-full bg-cyan-400/15"
                      transition={{ type: "spring", stiffness: 380, damping: 32 }}
                    />
                  ) : null}
                  <span className="relative z-10">{item.label}</span>
                </a>
              </li>
            );
          })}
        </ul>
      </nav>
    </motion.header>
  );
}
