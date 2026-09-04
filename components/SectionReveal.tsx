"use client";

import { motion } from "framer-motion";
import type { ReactNode } from "react";
import { cinematicEase } from "@/lib/content";

type SectionRevealProps = {
  children: ReactNode;
  className?: string;
  delay?: number;
};

export default function SectionReveal({
  children,
  className,
  delay = 0,
}: SectionRevealProps) {
  return (
    <motion.div
      className={className}
      initial={{ opacity: 0, y: 64, filter: "blur(8px)" }}
      whileInView={{ opacity: 1, y: 0, filter: "blur(0px)" }}
      viewport={{ once: false, amount: 0.28 }}
      transition={{ duration: 0.9, delay, ease: cinematicEase }}
    >
      {children}
    </motion.div>
  );
}
