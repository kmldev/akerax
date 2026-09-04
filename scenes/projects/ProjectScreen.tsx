"use client";

import type { Project } from "@/lib/content";
import { Html } from "@react-three/drei";
import { useFrame } from "@react-three/fiber";
import { useRef } from "react";
import type { Mesh, Vector3Tuple } from "three";

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
  const meshRef = useRef<Mesh>(null);

  useFrame((_, delta) => {
    if (!meshRef.current) return;
    const target = active ? 1.18 : 0.92;
    meshRef.current.scale.x += (target - meshRef.current.scale.x) * delta * 4;
    meshRef.current.scale.y += (target - meshRef.current.scale.y) * delta * 4;
  });

  return (
    <mesh ref={meshRef} position={position}>
      <planeGeometry args={[2.15, 1.4]} />
      <meshStandardMaterial
        color={project.accent}
        emissive={project.accent}
        emissiveIntensity={active ? 1.35 : 0.45}
        metalness={0.2}
        roughness={0.35}
        toneMapped={false}
      />
      <Html center distanceFactor={6.5}>
        <div
          className={`w-44 rounded-lg border px-3 py-2 text-center backdrop-blur-md ${
            active
              ? "border-cyan-300/50 bg-black/70 text-white"
              : "border-white/10 bg-black/45 text-zinc-200"
          }`}
        >
          <h2 className="text-sm font-bold">{project.name}</h2>
          <p className="mt-1 text-[11px] text-purple-300">{project.desc}</p>
        </div>
      </Html>
    </mesh>
  );
}
