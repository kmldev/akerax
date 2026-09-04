"use client";

import SectionReveal from "@/components/SectionReveal";
import { cinematicEase, profile } from "@/lib/content";
import { motion } from "framer-motion";
import { Form } from "radix-ui";
import { useState } from "react";
import { FaEnvelope, FaGithub } from "react-icons/fa";

const fieldClass =
  "w-full rounded-lg border border-white/10 bg-gray-800/80 p-3 text-white outline-none transition placeholder:text-zinc-500 focus:border-cyan-400/70 focus:ring-2 focus:ring-cyan-400/30";

export default function ContactForm() {
  const [status, setStatus] = useState<"idle" | "sent">("idle");

  return (
    <section
      id="contact"
      className="relative flex h-screen w-full items-center justify-center overflow-hidden bg-black text-white"
    >
      <div className="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(168,85,247,0.16),transparent_55%)]" />
      <SectionReveal className="relative z-10 flex w-full max-w-xl flex-col items-center px-6">
        <h2 className="text-3xl font-bold text-cyan-400 sm:text-4xl">Get in Touch</h2>
        <p className="mt-2 text-center text-sm text-zinc-400">
          {profile.location} — {profile.email}
        </p>

        <Form.Root
          className="mt-8 flex w-full flex-col gap-4"
          onSubmit={(event) => {
            event.preventDefault();
            const data = new FormData(event.currentTarget);
            const name = String(data.get("name") ?? "");
            const email = String(data.get("email") ?? "");
            const message = String(data.get("message") ?? "");
            const subject = encodeURIComponent(`Portfolio — ${name}`);
            const body = encodeURIComponent(`${message}\n\n— ${name} (${email})`);
            window.location.href = `mailto:${profile.email}?subject=${subject}&body=${body}`;
            setStatus("sent");
          }}
        >
          <Form.Field name="name" className="flex flex-col gap-2">
            <Form.Label className="text-sm text-cyan-200">Votre nom</Form.Label>
            <Form.Control asChild>
              <input required type="text" placeholder="Your Name" className={fieldClass} />
            </Form.Control>
            <Form.Message match="valueMissing" className="text-xs text-red-400">
              Le nom est requis.
            </Form.Message>
          </Form.Field>

          <Form.Field name="email" className="flex flex-col gap-2">
            <Form.Label className="text-sm text-cyan-200">Email</Form.Label>
            <Form.Control asChild>
              <input required type="email" placeholder="Your Email" className={fieldClass} />
            </Form.Control>
            <Form.Message match="valueMissing" className="text-xs text-red-400">
              L&apos;email est requis.
            </Form.Message>
            <Form.Message match="typeMismatch" className="text-xs text-red-400">
              Entrez un email valide.
            </Form.Message>
          </Form.Field>

          <Form.Field name="message" className="flex flex-col gap-2">
            <Form.Label className="text-sm text-cyan-200">Message</Form.Label>
            <Form.Control asChild>
              <textarea
                required
                rows={5}
                placeholder="Message"
                className={`${fieldClass} resize-none`}
              />
            </Form.Control>
            <Form.Message match="valueMissing" className="text-xs text-red-400">
              Le message est requis.
            </Form.Message>
          </Form.Field>

          <Form.Submit asChild>
            <motion.button
              type="submit"
              className="rounded-lg bg-purple-600 p-3 font-medium text-white shadow-[0_0_24px_rgba(168,85,247,0.35)] hover:bg-purple-800"
              whileHover={{ scale: 1.02 }}
              whileTap={{ scale: 0.98 }}
              transition={{ duration: 0.2, ease: cinematicEase }}
            >
              Send
            </motion.button>
          </Form.Submit>
        </Form.Root>

        {status === "sent" ? (
          <p className="mt-4 text-sm text-green-400">
            Client mail ouvert — à bientôt.
          </p>
        ) : null}

        <div className="mt-8 flex items-center gap-4 text-xl text-zinc-300">
          <a
            href={`mailto:${profile.email}`}
            aria-label="Email"
            className="transition hover:text-cyan-300"
          >
            <FaEnvelope />
          </a>
          <a
            href={profile.github}
            target="_blank"
            rel="noreferrer"
            aria-label="GitHub"
            className="transition hover:text-purple-300"
          >
            <FaGithub />
          </a>
        </div>
      </SectionReveal>
    </section>
  );
}
