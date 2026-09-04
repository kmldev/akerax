"use client";

import type { Job } from "@/lib/content";
import { Html } from "@react-three/drei";
import type { Vector3Tuple } from "three";

const accentMap = {
  cyan: "#22d3ee",
  purple: "#a855f7",
  green: "#4ade80",
} as const;

type TimelineCardProps = {
  job: Job;
  position: Vector3Tuple;
};

export default function TimelineCard({ job, position }: TimelineCardProps) {
  const accent = accentMap[job.accent];

  return (
    <mesh position={position}>
      <boxGeometry args={[2.35, 1.05, 0.18]} />
      <meshPhysicalMaterial
        color="#2e1064"
        transparent
        opacity={0.42}
        roughness={0.12}
        metalness={0.15}
        transmission={0.55}
        thickness={0.35}
        emissive={accent}
        emissiveIntensity={0.18}
      />
      <Html center distanceFactor={7} zIndexRange={[20, 0]}>
        <div className="w-44 rounded-xl border border-white/15 bg-black/55 px-3 py-2 text-center text-white shadow-[0_0_24px_rgba(168,85,247,0.25)] backdrop-blur-md">
          <h2 className="text-sm font-bold tracking-wide">{job.company}</h2>
          <p className="text-xs text-zinc-200">{job.role}</p>
          <p className="mt-1 text-[11px]" style={{ color: accent }}>
            {job.years}
          </p>
        </div>
      </Html>
    </mesh>
  );
}
