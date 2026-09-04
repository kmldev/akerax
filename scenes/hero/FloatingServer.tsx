"use client";

import { useFrame } from "@react-three/fiber";
import { useRef } from "react";
import type { Group, Mesh } from "three";

const LED_ROWS = 8;
const LED_PHASES = Array.from({ length: LED_ROWS }, (_, index) => index * 0.85);

export default function FloatingServer() {
  const groupRef = useRef<Group>(null);
  const ledRefs = useRef<(Mesh | null)[]>([]);

  useFrame((state) => {
    const t = state.clock.elapsedTime;
    if (groupRef.current) {
      groupRef.current.rotation.y = t * 0.28;
      groupRef.current.position.y = Math.sin(t * 0.85) * 0.18;
    }

    ledRefs.current.forEach((mesh, index) => {
      if (!mesh) return;
      const pulse = 0.55 + Math.sin(t * 3.2 + LED_PHASES[index]) * 0.45;
      mesh.scale.x = 0.85 + pulse * 0.2;
    });
  });

  return (
    <group ref={groupRef}>
      <mesh castShadow>
        <boxGeometry args={[1.45, 2.35, 0.95]} />
        <meshStandardMaterial
          color="#070b14"
          metalness={0.88}
          roughness={0.18}
          emissive="#14082a"
          emissiveIntensity={0.4}
        />
      </mesh>
      <mesh position={[0, 0, 0.48]}>
        <boxGeometry args={[1.32, 2.15, 0.04]} />
        <meshStandardMaterial color="#0c1220" metalness={0.6} roughness={0.3} />
      </mesh>
      {Array.from({ length: LED_ROWS }, (_, index) => (
        <mesh
          key={index}
          ref={(node) => {
            ledRefs.current[index] = node;
          }}
          position={[0, 0.92 - index * 0.24, 0.52]}
        >
          <boxGeometry args={[1.12, 0.1, 0.05]} />
          <meshStandardMaterial
            color={index % 2 === 0 ? "#22d3ee" : "#c084fc"}
            emissive={index % 2 === 0 ? "#22d3ee" : "#a855f7"}
            emissiveIntensity={2.4}
            toneMapped={false}
          />
        </mesh>
      ))}
      <mesh position={[0.58, 1.28, 0]}>
        <cylinderGeometry args={[0.035, 0.035, 0.45, 12]} />
        <meshStandardMaterial
          color="#67e8f9"
          emissive="#22d3ee"
          emissiveIntensity={1.6}
        />
      </mesh>
    </group>
  );
}
