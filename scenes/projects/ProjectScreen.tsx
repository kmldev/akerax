"use client";

import type { Project } from "@/lib/content";
import { Html } from "@react-three/drei";
import { useFrame } from "@react-three/fiber";
import { useRef } from "react";
import type { Group, Vector3Tuple } from "three";

type ProjectScreenProps = {
  project: Project;
  position: Vector3Tuple;
  active: boolean;
};

export default function ProjectScreen({
  project,
  position,
  active,
}: ProjectScreenProps) {
  const frameRef = useRef<Group>(null);

  useFrame((_, delta) => {
    if (!frameRef.current) return;
    const target = active ? 1.08 : 0.88;
    const current = frameRef.current.scale.x;
    const next = current + (target - current) * Math.min(1, delta * 4);
    frameRef.current.scale.setScalar(next);
  });

  return (
    <group position={position}>
      <group ref={frameRef}>
      <mesh>
        <boxGeometry args={[2.2, 1.48, 0.1]} />
        <meshStandardMaterial color="#07070e" metalness={0.75} roughness={0.28} />
      </mesh>
      <mesh position={[0, 0, 0.056]}>
        <planeGeometry args={[1.95, 1.22]} />
        <meshStandardMaterial
          color="#101018"
          emissive={project.accent}
          emissiveIntensity={active ? 0.28 : 0.1}
          metalness={0.15}
          roughness={0.55}
        />
      </mesh>
      </group>
      <Html
        center
        distanceFactor={7.5}
        pointerEvents="none"
        zIndexRange={[10, 0]}
        wrapperClass="pointer-events-none"
      >
        <div
          className={`w-40 rounded-lg border px-3 py-2 text-center backdrop-blur-md ${
            active
              ? "border-cyan-300/50 bg-black/75 text-white"
              : "border-white/10 bg-black/55 text-zinc-200"
          }`}
        >
          <h2 className="text-sm font-bold">{project.name}</h2>
          <p className="mt-1 text-[11px] text-purple-300">{project.desc}</p>
        </div>
      </Html>
    </group>
  );
}
