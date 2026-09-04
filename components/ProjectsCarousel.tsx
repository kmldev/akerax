"use client";

import SceneCanvas from "@/components/SceneCanvas";
import SectionReveal from "@/components/SectionReveal";
import { cinematicEase, projects } from "@/lib/content";
import CarouselRig from "@/scenes/projects/CarouselRig";
import { OrbitControls, Sparkles } from "@react-three/drei";
import { motion } from "framer-motion";
import { useState } from "react";
import { HiChevronLeft, HiChevronRight } from "react-icons/hi2";

export default function ProjectsCarousel() {
  const [active, setActive] = useState(0);
  const project = projects[active];

  const go = (direction: -1 | 1) => {
    setActive((current) => (current + direction + projects.length) % projects.length);
  };

  return (
    <section id="projects" className="relative h-screen w-full overflow-hidden">
      <SceneCanvas camera={{ position: [0, 0.15, 10], fov: 40 }}>
        <color attach="background" args={["#010308"]} />
        <ambientLight intensity={0.5} />
        <pointLight position={[3, 2, 5]} intensity={26} color="#22d3ee" />
        <pointLight position={[-4, -1, 3]} intensity={16} color="#a855f7" />
        <Sparkles count={40} scale={8} size={1.4} speed={0.28} color="#67e8f9" opacity={0.45} />
        <CarouselRig active={active} />
        <OrbitControls enableZoom={false} enablePan={false} />
      </SceneCanvas>

      <div className="pointer-events-none absolute inset-x-0 top-20 z-10 px-6">
        <SectionReveal>
          <h2 className="text-center text-3xl font-bold text-cyan-300 sm:text-4xl">
            Projects
          </h2>
          <p className="mt-2 text-center text-sm text-zinc-400">
            Écrans flottants — {project.name}
          </p>
        </SectionReveal>
      </div>

      <div className="pointer-events-none absolute inset-x-0 bottom-16 z-10 flex items-center justify-center gap-4">
        <motion.button
          type="button"
          aria-label="Projet précédent"
          onClick={() => go(-1)}
          className="pointer-events-auto rounded-full border border-cyan-400/40 bg-black/60 p-3 text-cyan-200 backdrop-blur-md"
          whileHover={{ scale: 1.08 }}
          whileTap={{ scale: 0.95 }}
          transition={{ duration: 0.2, ease: cinematicEase }}
        >
          <HiChevronLeft className="h-5 w-5" />
        </motion.button>
        <div className="pointer-events-auto flex gap-2">
          {projects.map((item, index) => (
            <button
              key={item.name}
              type="button"
              aria-label={item.name}
              onClick={() => setActive(index)}
              className={`h-2.5 w-2.5 rounded-full transition ${
                index === active ? "bg-cyan-300" : "bg-zinc-600"
              }`}
            />
          ))}
        </div>
        <motion.button
          type="button"
          aria-label="Projet suivant"
          onClick={() => go(1)}
          className="pointer-events-auto rounded-full border border-purple-400/40 bg-black/60 p-3 text-purple-200 backdrop-blur-md"
          whileHover={{ scale: 1.08 }}
          whileTap={{ scale: 0.95 }}
          transition={{ duration: 0.2, ease: cinematicEase }}
        >
          <HiChevronRight className="h-5 w-5" />
        </motion.button>
      </div>
    </section>
  );
}
