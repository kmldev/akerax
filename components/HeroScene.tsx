"use client";

import SceneCanvas from "@/components/SceneCanvas";
import SectionReveal from "@/components/SectionReveal";
import { cinematicEase, profile } from "@/lib/content";
import { useIsMobile } from "@/lib/useIsMobile";
import FloatingServer from "@/scenes/hero/FloatingServer";
import NeonField from "@/scenes/hero/NeonField";
import NeonGrid from "@/scenes/hero/NeonGrid";
import { ContactShadows, Float, OrbitControls } from "@react-three/drei";
import { motion } from "framer-motion";

export default function HeroScene() {
  const isMobile = useIsMobile();

  return (
    <section id="hero" className="relative h-screen w-full overflow-hidden">
      <SceneCanvas camera={{ position: [3.2, 1.4, 4.6], fov: 42 }}>
        <color attach="background" args={["#02010a"]} />
        <fog attach="fog" args={["#02010a", 8, 22]} />
        <ambientLight intensity={0.35} />
        <pointLight position={[5, 5, 5]} intensity={40} color="#67e8f9" />
        <pointLight position={[-4, 2, -3]} intensity={28} color="#c084fc" />
        <spotLight
          position={[0, 6, 2]}
          angle={0.45}
          penumbra={0.8}
          intensity={18}
          color="#ffffff"
        />
        <NeonField />
        <NeonGrid />
        <group
          position={isMobile ? [0, 1.15, 0] : [0, 0, 0]}
          scale={isMobile ? 0.7 : 1}
        >
          <Float speed={1.4} rotationIntensity={0.25} floatIntensity={0.35}>
            <FloatingServer />
          </Float>
        </group>
        <ContactShadows
          position={[0, -1.52, 0]}
          opacity={0.55}
          scale={10}
          blur={2.4}
          far={4}
        />
        <OrbitControls
          enableZoom={false}
          enablePan={false}
          autoRotate
          autoRotateSpeed={0.45}
          minPolarAngle={Math.PI / 3.4}
          maxPolarAngle={Math.PI / 1.75}
        />
      </SceneCanvas>

      <div className="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_top,rgba(34,211,238,0.12),transparent_42%)]" />
      <div className="pointer-events-none absolute inset-x-0 bottom-0 h-[58%] bg-gradient-to-t from-black via-black/80 to-transparent sm:hidden" />

      <div className="pointer-events-none absolute inset-0 flex items-end justify-center pb-12 sm:items-center sm:pb-0">
        <SectionReveal className="pointer-events-auto mx-4 max-w-3xl rounded-2xl border border-cyan-400/20 bg-black/70 px-5 py-5 text-center backdrop-blur-md sm:border-0 sm:bg-transparent sm:px-6 sm:py-0 sm:backdrop-blur-none">
          <p className="mb-3 text-xs tracking-[0.35em] text-cyan-300/80 uppercase">
            Premium 3D Portfolio
          </p>
          <h1 className="text-3xl font-bold text-cyan-300 drop-shadow-[0_0_18px_rgba(34,211,238,0.55)] sm:text-6xl">
            {profile.name}{" "}
            <span className="text-purple-300">| {profile.age}</span>
          </h1>
          <p className="mt-3 text-base text-purple-300 sm:text-xl">{profile.title}</p>
          <p className="mt-2 text-xs text-green-400 sm:text-base">{profile.stack}</p>
          <motion.a
            href="#experience"
            className="mt-6 inline-flex rounded-full border border-cyan-400/40 bg-cyan-400/10 px-6 py-2 text-sm font-medium text-cyan-100 shadow-[0_0_24px_rgba(34,211,238,0.25)] sm:mt-8"
            whileHover={{
              scale: 1.04,
              boxShadow: "0 0 32px rgba(34,211,238,0.45)",
            }}
            whileTap={{ scale: 0.98 }}
            transition={{ duration: 0.25, ease: cinematicEase }}
          >
            Explorer le parcours
          </motion.a>
        </SectionReveal>
      </div>
    </section>
  );
}
