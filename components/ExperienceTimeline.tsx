"use client";

import SceneCanvas from "@/components/SceneCanvas";
import SectionReveal from "@/components/SectionReveal";
import { jobs } from "@/lib/content";
import TimelineAxis from "@/scenes/timeline/TimelineAxis";
import TimelineCard from "@/scenes/timeline/TimelineCard";
import { OrbitControls, Stars } from "@react-three/drei";

export default function ExperienceTimeline() {
  const spacing = 1.7;
  const offset = ((jobs.length - 1) * spacing) / 2;

  return (
    <section id="experience" className="relative h-screen w-full overflow-hidden">
      <SceneCanvas camera={{ position: [0, 0, 9.5], fov: 45 }}>
        <color attach="background" args={["#05010d"]} />
        <ambientLight intensity={0.55} />
        <pointLight position={[4, 3, 6]} intensity={22} color="#c084fc" />
        <pointLight position={[-5, -2, 4]} intensity={14} color="#22d3ee" />
        <Stars radius={50} depth={30} count={900} factor={3} fade speed={0.4} />
        <TimelineAxis length={jobs.length * spacing + 1.2} />
        {jobs.map((job, index) => (
          <TimelineCard
            key={job.company}
            job={job}
            position={[
              index % 2 === 0 ? -1.85 : 1.85,
              offset - index * spacing,
              0,
            ]}
          />
        ))}
        <OrbitControls enableZoom={false} enablePan={false} />
      </SceneCanvas>

      <div className="pointer-events-none absolute inset-x-0 top-20 z-10 flex justify-center px-6">
        <SectionReveal>
          <h2 className="text-center text-3xl font-bold text-purple-300 sm:text-4xl">
            Experience
          </h2>
          <p className="mt-2 text-center text-sm text-zinc-400">
            Cartes glassmorphism le long d&apos;un axe néon
          </p>
        </SectionReveal>
      </div>
    </section>
  );
}
