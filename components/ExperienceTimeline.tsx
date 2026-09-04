"use client";

import SceneCanvas from "@/components/SceneCanvas";
import SectionReveal from "@/components/SectionReveal";
import { cinematicEase, jobs } from "@/lib/content";
import { Stars } from "@react-three/drei";
import { motion } from "framer-motion";

const accentClass = {
  cyan: "border-cyan-400/40 shadow-[0_0_28px_rgba(34,211,238,0.18)]",
  purple: "border-purple-400/40 shadow-[0_0_28px_rgba(168,85,247,0.18)]",
  green: "border-green-400/40 shadow-[0_0_28px_rgba(74,222,128,0.18)]",
} as const;

const accentDot = {
  cyan: "bg-cyan-300",
  purple: "bg-purple-400",
  green: "bg-green-400",
} as const;

const accentText = {
  cyan: "text-cyan-300",
  purple: "text-purple-300",
  green: "text-green-300",
} as const;

export default function ExperienceTimeline() {
  return (
    <section
      id="experience"
      className="relative w-full overflow-hidden [scroll-snap-align:none]"
    >
      <div className="absolute inset-0">
        <SceneCanvas camera={{ position: [0, 0, 8], fov: 50 }}>
          <color attach="background" args={["#05010d"]} />
          <Stars radius={60} depth={40} count={1200} factor={3.2} fade speed={0.35} />
        </SceneCanvas>
      </div>

      <div className="relative z-10 mx-auto max-w-5xl px-5 pt-28 pb-24 sm:px-8">
        <SectionReveal>
          <p className="text-center text-xs tracking-[0.35em] text-cyan-300/80 uppercase">
            Career path
          </p>
          <h2 className="mt-2 text-center text-3xl font-bold text-purple-300 sm:text-5xl">
            Parcours
          </h2>
          <p className="mx-auto mt-3 max-w-xl text-center text-sm text-zinc-400">
            De l&apos;expertise IT freelance aux plateformes full-stack et automation.
          </p>
        </SectionReveal>

        <div className="relative mt-16">
          <div className="absolute top-0 bottom-0 left-4 w-px bg-gradient-to-b from-cyan-400 via-purple-500 to-green-400 md:left-1/2 md:-translate-x-px" />

          <ol className="space-y-10">
            {jobs.map((job, index) => {
              const isLeft = index % 2 === 0;
              return (
                <motion.li
                  key={job.company}
                  initial={{ opacity: 0, y: 36 }}
                  whileInView={{ opacity: 1, y: 0 }}
                  viewport={{ once: true, amount: 0.35 }}
                  transition={{ duration: 0.55, delay: index * 0.05, ease: cinematicEase }}
                  className={`relative flex flex-col md:flex-row ${
                    isLeft ? "md:justify-start" : "md:justify-end"
                  }`}
                >
                  <span
                    className={`absolute top-8 left-4 z-10 h-3 w-3 -translate-x-1/2 rounded-full ring-4 ring-black ${accentDot[job.accent]} md:left-1/2`}
                  />
                  <article
                    className={`ml-10 w-[calc(100%-3rem)] rounded-2xl border bg-black/70 p-5 backdrop-blur-md md:ml-0 md:w-[calc(50%-2.25rem)] ${accentClass[job.accent]}`}
                  >
                    <div className="mb-4 flex h-16 items-center justify-center rounded-xl bg-white px-4">
                      {/* eslint-disable-next-line @next/next/no-img-element */}
                      <img
                        src={job.logo}
                        alt={`Logo ${job.company}`}
                        className="h-12 w-auto max-w-full object-contain"
                      />
                    </div>
                    <h3 className="text-lg font-bold tracking-wide text-white">
                      {job.company}
                    </h3>
                    <p className="mt-1 text-sm text-zinc-300">{job.role}</p>
                    <p className={`mt-2 text-sm font-medium ${accentText[job.accent]}`}>
                      {job.years}
                    </p>
                  </article>
                </motion.li>
              );
            })}
          </ol>
        </div>
      </div>
    </section>
  );
}
