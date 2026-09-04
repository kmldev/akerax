"use client";

import type { Project } from "@/lib/content";
import { Html, useTexture } from "@react-three/drei";
import { useFrame } from "@react-three/fiber";
import { useRef } from "react";
import { SRGBColorSpace, type Group, type Vector3Tuple } from "three";

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
  const map = useTexture(project.image, (texture) => {
    texture.colorSpace = SRGBColorSpace;
    texture.anisotropy = 8;
  });

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
          <boxGeometry args={[2.22, 1.32, 0.1]} />
          <meshStandardMaterial
            color="#07070e"
            emissive={project.accent}
            emissiveIntensity={active ? 0.18 : 0.06}
            metalness={0.75}
            roughness={0.28}
          />
        </mesh>
        <mesh position={[0, 0, 0.056]}>
          <planeGeometry args={[2.05, 1.15]} />
          <meshBasicMaterial map={map} toneMapped={false} />
        </mesh>
      </group>
      <Html
        position={[0, -0.82, 0.08]}
        center
        distanceFactor={8}
        pointerEvents="none"
        zIndexRange={[10, 0]}
        wrapperClass="pointer-events-none"
      >
        <div
          className={`w-44 rounded-lg border px-3 py-2 text-center backdrop-blur-md ${
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
