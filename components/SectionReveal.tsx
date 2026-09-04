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
    initial={{ opacity: 0, y: 56 }}
    whileInView={{ opacity: 1, y: 0 }}
      viewport={{ once: false, amount: 0.28 }}
      transition={{ duration: 0.9, delay, ease: cinematicEase }}
    >
      {children}
    </motion.div>
  );
}
